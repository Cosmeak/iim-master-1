import { sveltekit } from "@sveltejs/kit/vite";
import { defineConfig } from "vite";
import { Server } from "socket.io";
import tailwindcss from "@tailwindcss/vite";

const webSocketServer = {
  name: "webSocketServer",
  configureServer(server) {
    if (!server.httpServer) return;

    const io = new Server(server.httpServer);

    io.on("connection", (socket) => {
      socket.emit("eventFromServer", "Hello, World 👋");
    });
  },
};

export default defineConfig({
  plugins: [sveltekit(), tailwindcss(), webSocketServer],
});
