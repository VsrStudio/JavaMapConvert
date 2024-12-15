# JavaMapConvert

JavaMapConvert is a PocketMine plugin that converts Minecraft Java Edition maps to Minecraft Bedrock Edition. This plugin provides easy-to-use features for converting your Java worlds into Bedrock worlds, with additional support for multi-threading, a user-friendly UI, and real-time progress tracking.

## Features
- **Java to Bedrock Map Conversion:** Converts Minecraft Java Edition world files to Bedrock Edition.
- **Multi-threading Support:** Process large maps faster with multi-threaded conversion.
- **Real-time Progress Updates:** Displays progress in the console and in-game for players.
- **UI for Easy Map Conversion:** Allows players to select source and destination folders directly through a form.
- **Tile Entity Support:** Converts tile entities like chests and spawners.

## Installation
1. Download the plugin `JavaMapConvert.phar` or clone this repository.
2. Place the `JavaMapConvert` folder into the `plugins` directory of your PocketMine server.
3. Restart the server to load the plugin.

## Configuration
The plugin supports a `config.yml` where you can adjust the following settings:

```yaml
threads: 2  # Number of threads for multi-threaded conversion
logging: true  # Enable logging of conversion process
```

- threads: Set the number of threads to use for faster conversion.
- logging: Enable or disable logging of the conversion process.


## Commands

/convertmap <source_folder> <destination_folder>

Converts a Java world to a Bedrock world. This command is executed by admins and requires the source and destination folder paths.


/convertmapform
Opens a user-friendly UI for players to select the source and destination folders for conversion.

## Example Usage

1. Use the /convertmap command to convert a Java map:

/convertmap /home/maps/java /home/maps/bedrock

This will convert the world located in /home/maps/java to the destination folder /home/maps/bedrock.


2. Alternatively, use /convertmapform to open a UI and select the folders:

The UI will prompt you to enter the source and destination folders.

After confirming, the map conversion will begin.
