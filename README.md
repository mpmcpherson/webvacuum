# webvacuum
pulling down images from broken link server

A certain webcomic which shall remain nameless moved to wordpress at some point in the last several years. 
The migration broke about thirty percent of the links, as I discovered when I tried to do a deep dive on the archive
to escape the blasted heath that is the current sociopolitical climate.

So...I wrote a little script to pull down the images (one every ten seconds; I don't want to blow out the server), 
then host them locally. 

On review, it seems that for a period of some years in the middle of the twenty year run, the naming scheme altered 
significantly. So I'm missing that patch. 

The next step in this project will be to script out a primitive crawler to start in the archive pages, open each comic,
then parse the HTML for the image, *then* pull down the image into a sanely-named file that plays nice with the rest 
of the dataset.
