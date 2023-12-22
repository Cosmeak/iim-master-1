const AWS = require('aws-sdk');
const dynamoDB = new AWS.DynamoDB.DocumentClient();

exports.handler = async (event) => {
  console.log(event)

  const params = {
    TableName: process.env.STORAGE_USERS_NAME,
    Item: {
      id: event.userName,
    }
  };

  try {
    const data = await dynamoDB.put(params).promise();
    console.log("Données récupérées avec succès:", data);
    return { statusCode: 200, body: JSON.stringify(data.Item) };
  } catch (err) {
    console.error("Erreur lors de la récupération des données:", err);
    return { statusCode: 500, body: JSON.stringify({ error: "Une erreur est survenue lors de la récupération des données" }) };
  }
};
