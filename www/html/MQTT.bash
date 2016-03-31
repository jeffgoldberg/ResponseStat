#!/bin/sh

export PATH=$PATH:/usr/local/bin
export NODE_PATH=$NODE_PATH:/usr/local/lib/node_modules
export SERVER_PORT=80
export SERVER_IFACE='0.0.0.0'

case "$1" in
  start)
  exec forever --sourceDir=/var/www/html/mqtt -p /var/run/forever start mqtt_server.js
  ;;

  stop)
  exec forever stop --sourceDir=/var/www/html/mqtt mqtt_server.js
  ;;
esac

exit 0
