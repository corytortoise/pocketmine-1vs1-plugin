### 1vs1 plugin by Minifixio

### Description:
Extensive yet simple 1vs1 PvP plugin for PocketMine-MP.

Cool things:
-> Multiple arena support
-> Queue management
-> Support for custom spawn points, so you get maximum control of the arena.
-> Signs update automatically to show information regarding the queue/arenas.

TODO:
---
 - [X] Support for custom spawn points (No more fixed 10 spaces from center)
 - [X] Tap 1vs1 signs to join queue
   - [] Prevent accidentally joining queue when breaking sign
 - [] Custom Kit support (Maybe support a kit plugin like AdvancedKits?)
 - [] Allow more than one round per match. (Majority of X kills wins the match)
 - [] 2v2, 3v3, etc.? (Lot of work here.)
 - [] Support arena names and creators?
   - Example: When player joins arena: "You joined a 1vs1 against {opponent} on {ArenaName} by {ArenaMaker}"
 - [] Cleanup. Maybe remove debug stuff?
  - [] Find a better method of storing/retrieving arena and sign data?
 - [] Stats system for each player. Maybe through an extension plugin?
 - [] Submit to Poggit so that more people can use the plugin. :)
 - [] MOST IMPORTANT ISSUE: Fix line spacing. 


### How to use:
-> Use /arena create [1 : 2 : name]. 

Use /arena create 1 and /arena create 2 to mark the spawnpoints of an arena. Only after they are both set, you can use /arena create [name] to create an arena with that name and those two spawnpoints. You may also view a list of all arena names using /arena list.

-> Then, the players can start a duel doing /match, a countdown before the fight will start (only 2 players per arena) and they will be teleported in an arena and they will get a sword, armor and food and all their effects will be removed for fight. The fight last 3 minutes and at the end of the timer if there is no winners, the duel ends and the players are teleported back to the spawn.

-> You can place a sign and write on the 1st line : « [1vs1] » to have a 1vs1 stats sign with the numbers of active arenas and the number of the players in the queue. The signs refreshes every 5 seconds. The sign can also be clicked/hit by a player to join the duel queue.

### Technical:
-> After a fight, the players are teleported back to the spawn of the level defined in config.yml.

-> When a player quits in a fight, his opponent is declared the winner.

-> The arenas and the 1vs1’s signs positions are stored in the data.yml file.

-> When a player quits during the start match countdown, the match stops.


### Commands:
-> /match : join the 1vs1 queue
-> /arena [ 1 | 2 | create ]: Create a new arena.


### Notes:
-> This plugin was originally created by Minifixio. I have permission from him to continue development of this plugin. 

-> You can configure many things in this plugin(And hopefully more in the future). Utilizing the config.yml and messages.yml provided with the plugin is encouraged.

-> When /arena 1 or /arena 2 is run, every aspect of your position is saved for the arena. The direction you face when you run the command is given to the player when they join a match.

-> Feel free to make any comments/suggestions for this plugin. For issues, please be descriptive and use the issue tracker in the GitHub repo. If you want to contribute, make a Pull Request.
