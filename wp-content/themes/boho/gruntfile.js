module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json')
    ,sass: {
      dist: { 
         files: [{
          expand: true,
          cwd: 'sass',
          src: '*.scss',
          dest: '',
          ext: '.css'
        }]
      }
    }
    ,watch: {
      css: {
        files: [
          'sass/*.scss'
          ,'sass/**/*.scss'
        ]
        ,tasks: ['sass']
        ,options: {
          livereload: true,
        }
      },
    }
  });
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask('default', ['sass','watch']);
};