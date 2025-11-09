# PHP ObjectId

**Fast, lightweight MongoDB-style ObjectId generator for PHP.**

[![Tests](https://github.com/wooserv/php-objectid/actions/workflows/tests.yml/badge.svg)](https://github.com/wooserv/php-objectid/actions/workflows/tests.yml)
[![License](https://img.shields.io/github/license/wooserv/php-objectid.svg)](LICENSE)

---

## Installation
```bash
composer require wooserv/php-objectid
```

## Usage
```bash
use WooServ\ObjectId\ObjectId;

$id = ObjectId::generate();

if (ObjectId::isValid($id)) {
    echo "Timestamp: " . date('Y-m-d H:i:s', ObjectId::getTimestamp($id));
}
```

## Tests
```bash
composer test
```

---

## License

MIT © [WooServ](https://www.wooserv.com/)