source .env
#export

UserID=$UID
GroupID=$(id -g)
USER=$USER

docker compose up -d
