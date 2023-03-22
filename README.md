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

### Bootstrap
Default version of Bootstrap is version 4. On could change to version 5.
```
    bootstrap:
      version: 5
```


### Bootswatch
Check out plugin bootstrap/bootswatch_v431 for availible theme settings. Param data/bootswatch/theme has to be set to one of www.bootswatch.com themes for version 4.3.1. If not set theme Cerulean is used.
```
    bootswatch:
      theme: Cerulean
```
### Icon
Put your icon in this folder.
```
/theme/[theme]/icon/link_icon.png
```
Path to icon can be changed. Default value below.
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
Add title from layout or page settings/title (if one or more is set).
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
