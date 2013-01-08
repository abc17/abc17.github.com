---
layout: page
title: Простые рецепты по системе "Пятнашки"
tagline: 
---
{% include JB/setup %}

  {% for post in site.posts %}
  <h1><a href="{{ post.url }}">{{ post.title }}</a></h1>
  <p class="meta">
    {{ post.date | date_to_long_string }} 
    {% if post.location %}{{ post.location }}{% endif %}
  </p>
  {{ post.content }}
  {% endfor %}

