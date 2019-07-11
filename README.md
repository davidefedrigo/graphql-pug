## Building my first GraphQL Server in PHP

**PHP User Group Milano - 2019-07-10**

### Slides:
https://speakerdeck.com/davidefedrigo/building-my-first-graphql-server-in-php

### Project Setup

```bash
docker-compose up -d
````

#### Minimal Example

GraphQL endpoint: http://localhost/graphql-inline

```graphql
{
  randomMovie {
    title
  }
}
```

#### User Input Example

GraphQL endpoint: http://localhost/graphql

```graphql
{
  movies(year:1985) {
    title(language: ENGLISH)
  }
}
```


#### Abstract Types Example

GraphQL endpoint: http://localhost/graphql

```graphql
{
  search(matching:"game") {
    ... on Movie {
      title
      runningTime
    }
    ... on TvSeries {
      title
      seasons {
        episodes {
          runningTime
        }
      }
    }
  }
}
```

