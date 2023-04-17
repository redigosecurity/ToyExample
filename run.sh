echo "Running the docker instances"

docker compose  -f apache/docker-compose.yml up -d 

docker compose  -f nginx/docker-compose.yml up -d

docker compose  -f node/docker-compose.yml up -d

echo "Running the web server"

flask run


