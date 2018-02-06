# VaderLabSecurityBundle

Bundle for the Symfony framework
Push notification for customers.


## Getting Started

### Requirements

```
    "php": ">=7.2",
    "symfony/symfony": ">=3.4",
    "textalk/websocket": "^1.2"
```

### Installing

Update composer.json

```
"require" : {
    [...]
    "vaderlab/event-publisher-bundle" : "^v1.0.0"
},
    "repositories" : [{
        "type" : "vcs",
        "url" : "https://github.com/vaderlab-com/EventPublisherBundle.git"
    }],
```


And install bundle 

```
composer update vaderlab/event-publisher-bundle
```

Configure config.yml

```
vaderlab:
    event_publisher:
        websocket_uri: 'wss://events.vaderlab.com'      # Event server uri 
        api_key: <api_key>                              # Api key for user with access
```

## Running the tests

@todo

## Authors

* **Stanislau Komar** - *Initial work* - [Asisyas](https://github.com/Asisyas)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

