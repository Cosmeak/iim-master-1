const awsServerlessExpress = require('aws-serverless-express');
const app = require('./app');
const AWS = require('aws-sdk');
const dynamoDB = new AWS.DynamoDB.DocumentClient();

/**
 * @type {import('http').Server}
 */
const server = awsServerlessExpress.createServer(app);

/**
 * @type {import('@types/aws-lambda').APIGatewayProxyHandler}
 */
exports.handler = async (event) => {
  console.log(`EVENT: ${JSON.stringify(event)}`);

  const user = event.requestContext.identity.cognitoAuthenticationProvider.split(':CognitoSignIn:')[1]
  console.log(`SALUT`)
  console.log(`company: ${JSON.parse(event.body).company}`)

  const params = {
    TableName: process.env.STORAGE_USERS_NAME,
    Item: {
      id: user,
      firstname: JSON.parse(event.body).firstname,
      lastname: JSON.parse(event.body).lastname,
      company: JSON.parse(event.body).company,
    }
  };

  try {
    const data = await dynamoDB.put(params).promise();
    console.log("Données récupérées avec succès:", data);
    return {
      statusCode: 200,
      headers: {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Headers": "*"
      },
      body: JSON.stringify(data.Item)
    };
  } catch (err) {
    console.error("Erreur lors de la récupération des données:", err);
    console.log(awsServerlessExpress.proxy(server, event, 'PROMISE').promise);
    return { statusCode: 500, body: JSON.stringify({ error: "Une erreur est survenue lors de la récupération des données" }) };
  }
};
