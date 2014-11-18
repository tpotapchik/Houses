#!/bin/bash

echo '*****************'
echo 'Deploy tool v 1.0'
echo '*****************'

deploymentEnv="production"

if [[ !"$#" -eq "0" ]]
then
    deploymentEnv=$1
fi

echo "$deploymentEnv env will be deployed"

#./nginx/init --env=$deploymentEnv
./init --env=$deploymentEnv
./yii migrate --interactive=0