# Buto-Plugin-ThemeInclude
This plugin include other plugins matching Bootstrap 4 usage. It will keep your theme settings file smaller.
## Widget
Include widget in html head section.
```
type: widget
data:
  plugin: 'theme/include'
  method: include
  data:
```
### Bootswatch
Check out plugin bootstrap/bootswatch_v431 for availible theme settings. Param data/bootswatch/theme has to be set to one of www.bootswatch.com themes for version 4.3.1. If not set theme Cerulean is used.
```
    icon: '/theme/[theme]/icon/link_icon.png'
    bootswatch:
      theme: Cerulean
```
### Icon
Path to icon is optional. Default value below.
```
    icon: '/theme/[theme]/icon/link_icon.png'
```
### Noindex
Set enable to true to stop search engins for indexing pages.
```
    noindex:
      enabled: true
```

### Icons
We are using Bootstrap icons 1.8.1.
For a while we also using Octicons. To include them this settings has to be set.
```
    icons:
      octicons: true
```

### Methods
To modify data one could call a method.
```
    methods:
      -
        plugin: memb_inc/vote_public
        method: set_icon
```

### Title
Add title from page settings.
```
settings:
  title: My page
```

### Meta data
Add meta data from page settings description, keywords, author.
```
settings:
  description: 'My description.'
  keywords: 'word, word'
  author: Buto
```
