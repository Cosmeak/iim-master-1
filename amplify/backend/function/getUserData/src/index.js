const awsServerlessExpress = require('aws-serverless-express');
const app = require('./app');
const AWS = require("aws-sdk");
const dynamoDB = new AWS.DynamoDB.DocumentClient();

/**
 * @type {import('http').Server}
 */
const server = awsServerlessExpress.createServer(app);

/**
 * @type {import('@types/aws-lambda').APIGatewayProxyHandler}
 */
exports.handler = async (event, context) => {
  const params = {
    TableName: process.env.STORAGE_USERS_NAME,
  };

  try {
    const data = await dynamoDB.scan(params).promise();
    console.log("Données récupérées avec succès:", data);
    return {
      statusCode: 200,
      headers: {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Headers": "*"
      },
      body: JSON.stringify(data.Items)
    };
  }
  catch (err) {
    console.error("Erreur lors de la récupération des données:", err);
    console.log(awsServerlessExpress.proxy(server, event, 'PROMISE').promise);
    return { statusCode: 500, body: JSON.stringify({ error: "Une erreur est survenue lors de la récupération des données" }) };
  }

};
