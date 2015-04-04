module.exports = (grunt) ->
  grunt.initConfig

    csslint:
      src: '*.css'
      options:
        'unqualified-attributes': false
        'outline-none': false
        'compatible-vendor-prefixes': false
        'box-sizing': false
        'box-model': false #whidthを指定したものにpaddingで警告
        'unique-headings': false
        'font-sizes': false #フォントサイズ指定数が多いと警告
        'namespaced': false
        'qualified-headings': false
        'targets IE6/7': false
        'star-property-hack': false

    jshint:
      src: 'js/main.js'
      option:
        curly: true #ループや条件分岐の{}を省略しない
        eqeqeq: true #厳密比較を行う
        unused: true #使っていない変数の宣言を禁止する
        undef: true #グローバル変数へのアクセスを禁止
        browser: true #ブラウザ用グローバル変数は許可
        devel: true #consoleやalertの使用を許可する
        latedef: true #定義する前に変数を使用することを禁止
        globals:
          jQuery: true

    compass:
      dist:
        options:
          config: 'config.rb'

    watch:
      cssdev:
        files: 'sass/*.scss'
        tasks: [
          'compass'
          'csslint'
        ]

      jsdev:
        files: 'js/*.js'
        tasks: 'jshint'

  # http://localhost:35729/ にアクセスしてlivereload
    livereloadx:
#      proxy: "http://localhost/blog/"
#      'prefer-local': true
      static: true
      dir: '.'
      filter: [
        {
          type: 'include'
          pattern: '*.{html,php,css,js}'
        }
        {
          type: 'exclude'
          pattern: '*'
        }
      ]

  pkg = grunt.file.readJSON 'package.json'
  for taskName of pkg.devDependencies
    grunt.loadNpmTasks taskName  if taskName.substring(0, 6) is "grunt-"
  grunt.loadNpmTasks 'livereloadx'

  grunt.registerTask 'default', ['livereloadx', 'watch']