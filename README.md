# mathexBot

mathexBot is an inline [Telegram](https://www.telegram.org) bot that generates on-the-fly images based on LaTeX mathematical notation. Ever felt the need to send your friends some complex formula, only to end up writing some ungly pseudo-code that takes hours to understand? Wait no more, mathexBot will provide you with everything you need!

You can either use the source code as it is, and host it somewhere, or you can use `mathexbot`, a Telegram bot that is running this very code on my own server. To use it anywhere, simply type `@mathexbot [LaTeX notation]` (e.g. `@mathexbot V = \pi\int_{a}^{b}f(x)^{2}dx`) and you're good to go! 

If, on the other hand, you'd rather host your own bot, do the following:
  - register a new bot (ask the [BotFather](https://t.me/BotFather) about that)
  - host your bot on your web server, making sure you have your own SSL certificate
  - set a new webhook for your bot (more about that on [Telegram Bot API](https://core.telegram.org/bots/api#setwebhook), including a guide for using self-signed certificates)
  - your bot is up and running!

Please note that mathexbot makes use of [mathTeX](http://www.forkosh.com/mathtex.html). For your convenience, a compiled version is already included as part of this repo (mathtex.cgi). If you're unconfortable with it, or would like to recompile it for any other reason, feel free to download the latest version from the project website. 

