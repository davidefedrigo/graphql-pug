
class: center, middle

# Building my first GraphQL server using PHP

---

class: center, middle

# Disclaimer

Never done it before!

---

# PHP libraries

| a | aa |
| --- | --- |
| webonyx/graphql-php | a |
| altro | a |

---

# Introduction to GraphQL

A GraphQL service is created by defining types and fields on those types, then providing functions for each field on each type.

```graphql
type Query {
  me: User
}

type User {
  id: ID
  name: String
}
```

Along with functions for each field on each type:

```graphql
function Query_me(request) {
  return request.auth.user;
}

function User_name(user) {
  return user.getName();
}
```

---

# Title

This is the firsttttt slide
[//]: # (and this is a comment that isn't shown in the slide)

---

# Stuff to remember

1. Press "P" for presentation mode
    - Press "T" to reset timer
2. Press "C" to clone window
3. Press "H" to view help

???
Oh yeah, it's also possible to include notes!

---

class: left

# Simple and easy

```javascript
console.log("It's markdown. How much simpler can it get?")
```

MathJax is also supported!

$$x = {-b \pm \sqrt{b^2-4ac} \over 2a}$$
<br/>
<br/>
<br/>
**[RemarkPortable](https://github.com/BenTearzz/RemarkPortable)**, created from the project **[Remark](https://github.com/gnab/remark)** 

[![MIT License](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

.footnote[.red[*] You can also include a footnote! ]