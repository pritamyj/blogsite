import gulp from 'gulp';
import imagemin from 'gulp-imagemin';
import uglify from 'gulp-uglify';
import concat from 'gulp-concat';
import Sass from 'sass';
import gulpSass from 'gulp-sass' ; 
const sass = gulpSass(Sass);


gulp.task('msg', async function(){
	return console.log('gulp is running.......');
});

gulp.task('default', async function(){
	return console.log('gulp is running(default).......');
});
 


gulp.task('copyphp', async function(){
	gulp.src('src/templates/Admin/*.php')
	.pipe(gulp.dest('dest/templates/Admin'));
});

gulp.task('copydir', async function(){
gulp.src([   
    // 'src/*.php',
    // 'src/templates/**/*',
    'src/**/*', 
])
.pipe(gulp.dest('dest/'));
});




 gulp.task('imageMin', async function(){
	gulp.src('src/images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('dest/images'))
 });


 gulp.task('minify', async function(){
 	gulp.src('src/templates/js/*')
 	.pipe(uglify())
		.pipe(gulp.dest('dest/templates/js'));
 });



 
 gulp.task('scripts', async function(){
 	gulp.src('src/templates/js/*')
 	.pipe(concat('main.js'))
 	.pipe(uglify())
		.pipe(gulp.dest('dest/templates/js'));
 });



 
 gulp.task('scss', async function(){
 	gulp.src('src/sass/*.scss')
 	.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('dest/css'));
 });



 
   gulp.task('default', gulp.series('msg', 'copyphp','copydir', 'imageMin', 'minify', 'scripts', 'scss' ));


 gulp.task('watch', function(){
 	gulp.watch('src/**/*',gulp.series('copydir'));
 	gulp.watch('src/images/*',gulp.series('imageMin'));
 	gulp.watch('src/templates/js/*',gulp.series('minify'));
 	gulp.watch('src/templates/js/*',gulp.series('scripts'));
 	gulp.watch('src/sass/*.scss',gulp.series('scss'));
 });
