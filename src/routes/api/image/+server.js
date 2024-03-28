import { env } from "$env/dynamic/private"
import OpenAI from "openai";
import { json } from "@sveltejs/kit";

export async function POST({request}) {
    const openai = new OpenAI({
        apiKey: env.OPEN_AI_API_KEY,
    });

    const { prompt } = await request.json();

    const response = await openai.images.generate({
        model: "dall-e-3",
        prompt: prompt,
        n: 1,
        size: "1024x1024",
    });
    console.log(response.data[0])

    return json({image: response.data[0].url})
}