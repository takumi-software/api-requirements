## Product Api
#### Requirements
- Docker
  - macOS: [docker-ce-desktop-mac](https://hub.docker.com/editions/community/docker-ce-desktop-mac)
  - Linux: [get.docker.com](https://get.docker.com)
- Docker Compose
    - macOS [install guide](https://docs.docker.com/compose/install/#install-compose-on-macos) (Already installed with Docker for Mac)
    - Linux: [install guide](https://docs.docker.com/compose/install/#install-compose-on-linux-systems)

---
## Run Api

> All instructions bellow must be executed on the root path.

#### Start containers
```bash
docker-compose up
```
#### Stop containers
```bash
docker-compose down
```
#### Set api up
```bash
docker-compose run --rm composer install
docker-compose run --rm artisan key:generate
docker-compose run --rm artisan migrate --seed
sudo chown -R $(whoami):$(whoami) .
sudo chmod -R 775 ./api-requirements/bootstrap/cache
sudo chmod -R 775 ./api-requirements/storage
```
#### Dependencies
- [laracasts/presenter](https://github.com/laracasts/presenter)
- [spatie/laravel-enum](https://github.com/spatie/laravel-enum)
- [spatie/laravel-query-builder](https://github.com/spatie/laravel-query-builder)
- [timacdonald/json-api](https://github.com/timacdonald/json-api)
- [pestphp][https://pestphp.com/]
#### Endpoints
- `GET http://localhost/products`
- `GET http://localhost/products?filter[category]=insurance`
- `GET http://localhost/products?filter[price]=89000`
- `GET http://localhost/products?filter[price]=50000..89000`
- `GET http://localhost/products?filter[category]=vehicle&filter[price]=89000`
#### Testing api
```bash
docker-compose run --rm pest
```
