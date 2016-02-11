#!/bin/bash

SCRIPT=`realpath $0`
SCRIPTPATH=`dirname $SCRIPT`

$SCRIPTPATH/tweetbot.php v >> $SCRIPTPATH/log.txt