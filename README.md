# Hackathon_Blackfire

## Synopsis
A magento modul which enables a basic integration with Blackfire.io profiling, created for the MUG Hackathon Groningen 23-01-2016.

## Requirements
You need to install the Blackfire php package, agent and client. You'll also need to create an account to get credentials and a personal dashboard. Go to To use this extension you need to install the Blackfire php module, agent and cli client. You'll also need to create an account at Blackfire.io for obtaining credentials. Go to for more info https://blackfire.io/docs/up-and-running/installation for more info.

## Current functionality
* Installs the Blackfire php library for easy api access.
* Provides an example plugin / interceptor, which profiles $product->load() and sends results to your account.
* Contains a start for developing a Blackfire profiling factory, which when finished should allow you to set  ```SetEnv MAGE_PROFILER html``` in .htaccess. This would output profiling to Blackfire.io, instead of the already available browser output or Firebug.

## ToDO
* Remove Blackfire.io credentials from BlackfireProductPlugin.php and move it to system config
  * Finish system config and fallback to default empty config object, which is supposed to use your system Blackfire defaults.
* Finish the Blackfire profiling from .htaccess setting functionality
* Determine roadmap beyond this ToDo : )