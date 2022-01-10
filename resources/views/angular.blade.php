@php
$public = public_path('js/');
$diference = ['.', '..', '3rdpartylicenses.txt', 'favicon.ico', 'index.html'];
$files = array_diff(scandir($public), $diference);
preg_match('/styles.*/', implode(' ', $files), $css);
preg_match('/runtime.*/', implode(' ', $files), $runtime);
preg_match('/polyfills.*/', implode(' ', $files), $polyfills);
preg_match('/main.*/', implode(' ', $files), $main);
@endphp
<!DOCTYPE html><html lang="en"><head>
    <meta charset="utf-8">
    <title>BRyAngularTest</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="/js/{{$css[0]}}"></head>
  <body>
    <app-root></app-root>
  <script src={{asset("/js/".str_replace($css[0], '', $runtime[0]))}} type="module"></script>
  <script src={{asset("/js/". str_replace($runtime[0], '', $polyfills[0]))}} type="module"></script>
  <script src={{asset("/js/".str_replace($polyfills[0], '', $main[0]))}} type="module"></script>
  </body></html>