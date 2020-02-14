if [ $# -lt 2 ]
  then
    echo "Not enough arguments given, exiting"
    exit
fi

url="https://api.travis-ci.org/repo/CopenhagenCityArchives%2Flinklives-wordpress-infrastructure/requests"
body='{
"request": {
"branch":"'$1'"
}}'

echo "sending body" $body "to url" $url
 
curl -s -X POST \
   -H "Content-Type: application/json" \
   -H "Accept: application/json" \
   -H "Travis-API-Version: 3" \
   -H "Authorization: token "$2"" \
   -d "$body" \
   $url

