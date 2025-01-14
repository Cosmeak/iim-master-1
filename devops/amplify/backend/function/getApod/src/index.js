/* Amplify Params - DO NOT EDIT
	ENV
	REGION
	STORAGE_NASA_ARN
	STORAGE_NASA_NAME
	STORAGE_NASA_STREAMARN
Amplify Params - DO NOT EDIT */

const aws = require("aws-sdk");
const secretManager = new aws.SecretsManager();
const dynamoDB = new aws.DynamoDB.DocumentClient();
const crypto = require("node:crypto");

/**
 * @type {import('@types/aws-lambda').APIGatewayProxyHandler}
 */
exports.handler = async (event) => {
  const nasaSecret = await secretManager.getSecretValue({ SecretId: "nasa_api_key" }).promise();
  const response = await fetch("https://api.nasa.gov/planetary/apod?count=10&api_key=" + JSON.parse(nasaSecret.SecretString).nasa_api, {
    method: "GET",
  });

  const resJson = await response.json();
  
  for (const apod of resJson) {
    const params = {
      TableName: process.env.STORAGE_NASA_NAME,
      Item: {
        id: crypto.randomUUID(),
        copyright: apod.copyright,
        title: apod.title,
        explanation: apod.explanation,
        image: apod.hdurl,
      }
    };

    await dynamoDB.put(params).promise();
  }
};