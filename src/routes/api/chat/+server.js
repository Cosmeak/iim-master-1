import MistralClient from "@mistralai/mistralai";
import { env } from "$env/dynamic/private";

/** @type {import('./$types').RequestHandler} */
export async function POST({ request }) {
  const { message } = await request.json();
  const client = new MistralClient(env.MISTRAL_API_KEY);
  const response = client.chatStream({
    model: "open-mistral-7b",
    messages: [{ role: "user", content: message }],
  });

  const stream = new ReadableStream({
    async start(controller) {
      for await (const chunk of response) {
        if (chunk.choices[0].delta.content !== undefined) {
          const streamText = chunk.choices[0].delta.content;
          controller.enqueue(streamText);
        }
      }
      controller.close();
    },
  });

  return new Response(stream, {
    headers: {
      "Content-Type": "text/event-stream",
    },
  });
}
