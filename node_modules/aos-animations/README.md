# AOS-Animations 🦄


Some nice animations to use with [AOS](https://github.com/michalsnik/aos).


## How to use

0. Install AOS following their instructions (https://github.com/michalsnik/aos).

1. Install our package with:


`yarn add aos-animations` or `npm i --save aos-animations`



2. Add css and js files to your html file:

``` html

<link rel="stylesheet" href="node_modules/aos-animations/dist/animations.min.css">

...

<script src="node_modules/aos-animations/dist/animations.min.js"></script>

```

or import to your js file:


``` js

import 'aos-animations/dist/animations.min.css';
import 'aos-animations/dist/animations.min.js';

```

3. Start using!


## Example usage:

You will need to add the `data-aos` attribute to the element you want to animate and then specify the animation you would like to use. Our animations support all the configurations you can do with AOS such as changing delay, easing and duration (more [here](https://github.com/michalsnik/aos#2-set-animation-using-data-aos-attribute)).

Example:


``` html

<div data-aos="tr-lr">Revealing text from left to right!</div>

```


#### Example with some tweekings:

``` html

<div 
  data-aos="tr-lr"
  data-aos-offset="200"
  data-aos-delay="50"
  data-aos-duration="1000"
  data-aos-easing="ease-in-out"
>Revealing text from left to right!</div>

```


## Animations:

| Animation                      | `data-aos` |
|--------------------------------|------------|
| Text reveal from left to right | `tr-lr`    |
| Text reveal from bottom to top | `tr-bt`    |
| Text reveal from top to bottom | `tr-tb`    |
| Fade in | `fi`    |
| Fade in up | `fi-u`    |
| Fade in down | `fi-d`    |
| Fade in left | `fi-l`    |
| Fade in right | `fi-r`    |


