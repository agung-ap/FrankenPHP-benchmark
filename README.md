# 🚀 FrankenPHP vs. Nginx vs. Apache Benchmark

This repo was created to compare the performance of FrankenPHP, Nginx, and Apache—popular servers in the PHP world—under various scenarios. All tests are configured on Docker to provide a fair and reproducible environment.

## 🛠️ Technologies Used

- **Docker & Docker Compose**: To isolate and manage the test environment
- **PHP 8.3**: The PHP version used in all tests
- **FrankenPHP**: A modern, Caddy-based PHP application server
- **Nginx**: A high-performance web server and reverse proxy
- **Apache**: One of the world's most widely used web servers
- **Bombardier**: The HTTP benchmarking tool used to run the tests

## 🏁 Getting Started

Follow the steps below to run this benchmark on your own machine.

### Requirements

- Docker Desktop must be installed on your system

### Setup

1. Clone the repo:

```bash
git clone https://github.com/agung-ap/FrankenPHP-benchmark.git
```

2. Go to the project directory:

```bash
cd FrankenPHP-benchmark
```

3. Bring up all services with Docker Compose:

```bash
docker compose up -d --build
```

This command will pull and build all required images and start the containers in the background.

## 🧪 Running the Benchmark Tests

All tests are run via the benchmark-tool service using bombardier.

### Scenario 1: Hello World (Raw Performance)

This test measures the basic request-handling capacity of the servers.

```bash
# FrankenPHP
docker compose run --rm benchmark-tool -c 100 -d 10s http://frankenphp:80/?action=hello

# Nginx
docker compose run --rm benchmark-tool -c 100 -d 10s http://nginx:80/?action=hello

# Apache
docker compose run --rm benchmark-tool -c 100 -d 10s http://apache:80/?action=hello
```

### Scenario 2: CPU-Intensive Workload (Fibonacci Test)

This test measures the CPU efficiency of the servers under a heavy PHP script.

```bash
# FrankenPHP
docker compose run --rm benchmark-tool -c 20 -d 20s http://frankenphp:80/?action=cpu

# Nginx
docker compose run --rm benchmark-tool -c 20 -d 20s http://nginx:80/?action=cpu

# Apache
docker compose run --rm benchmark-tool -c 20 -d 20s http://apache:80/?action=cpu
```

### Scenario 3: I/O-Intensive Workload (File Read/Write)

This test measures the performance of the servers in operations that require waiting, such as reading/writing to disk.

```bash
# FrankenPHP
docker compose run --rm benchmark-tool -c 100 -d 10s http://frankenphp:80/?action=io

# Nginx
docker compose run --rm benchmark-tool -c 100 -d 10s http://nginx:80/?action=io

# Apache
docker compose run --rm benchmark-tool -c 100 -d 10s http://apache:80/?action=io
```
## 📊 Results (Intel Core Ultra 7 255H, 16 cores, 7.5GB RAM)

The requests-per-second (RPS) values obtained from the tests are as follows.

### "Hello World" Results

| Server | Requests per Second (RPS) |
|--------|------------------------|
| FrankenPHP | ~27,453.94 |
| Nginx + PHP-FPM | ~10,917.91 |
| Apache + PHP-FPM | ~9,452.01 |

### CPU-Intensive Workload Results

| Server | Requests per Second (RPS) |
|--------|------------------------|
| FrankenPHP | ~14.64 |
| Nginx + PHP-FPM | ~13.12 |
| Apache + PHP-FPM | ~13.05 |

### I/O-Intensive Workload Results

| Server | Requests per Second (RPS) |
|--------|------------------------|
| FrankenPHP | ~11,603.78 |
| Nginx + PHP-FPM | ~6,643.11 |
| Apache + PHP-FPM | ~4,898.31 |


## 🤝 Contributing

Your contributions will make this project even better. Feel free to open a Pull Request or create an Issue.

1. Fork the project
2. Create a new branch (`git checkout -b feature/AmazingFeature`)
3. Make your changes and commit them (`git commit -m 'Add some AmazingFeature'`)
4. Push your branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📜 License

This project is licensed under the MIT License. See the LICENSE file for more information.
