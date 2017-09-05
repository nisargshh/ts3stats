# ts3stats
## This is an application to see the average and max users of a teamspeak server in a graphical representation.

------------------------------------------

### What Is Teamspeak?
TeamSpeak is proprietary voice-over-Internet Protocol (VoIP) software for audio communication between users on a chat channel, much like a telephone conference call. Users typically use headphones with a microphone. The client software connects to a TeamSpeak server of the user's choice, from which the user may join chat channels.
The target audience for TeamSpeak is gamers, who can use the software to communicate with other players on the same team of a multiplayer game. Communicating by voice gives a competitive advantage by enabling players to keep their hands on the controls.

---------------------------------------------------------------

### What Does This Application Do?What Does This Application Do?
•	This application runs every 30 minutes using cron(recommended is 30 minutes). It gets data from API provided by Planet Teamspeak  (could have used a package that gets the amount of users after a specific time period but using API was simpler and cleaner).

•	The application stores all the data provided in the API into MySQL database. The application stores the time period, average users and max users in an array.

• This array is passed onto JavaScript and displayed as a graph using the ChartJS

