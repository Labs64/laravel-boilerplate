## Awesome! How do I contribute?

There are a few things that are required for you to contribute to this dataset. First of all, you need to make yourself a GitHub account, if you don't have one already. It's free and easy to set up, and should take less than five minutes.

Beyond that, there are two main ways to contribute to this dataset: one is to **edit existing points**; the other is to **add your own points** to the [repository](maps).
There are step-by-step instructions for doing each of these, below.

1. If you haven't done so yet, get yourself a [GitHub](http://github.com) account and download [git](http://git-scm.org).
2. If you're using the Chrome browser, download the [geojson.io Chrome extension](https://chrome.google.com/webstore/detail/geojsonio/oibjgofbhldcajfamjganpeacipebckp). This will allow you to click-through directly from your GeoJSON file to geojson.io.
3. Once you're all logged in to your GitHub account, navigate over to the [maps-munich-sportive](https://github.com/Labs64/maps-munich-sportive) repo and press the button at the top that says *Fork*. Forking a repo makes a copy of it that is all yours. Head on over to *github.com/[yourusername]/maps-munich-sportive*. This is your copy of the repo!
4. In your copy navigate to the GeoJSON files located at */maps* and click-through to the file you want to edit. You should see a map showing the points in the dataset. Click on one of the points. A popup appears with attribute information for the point.
5. **If you're using the Chrome extension**, you will see a little button that says geojson.io. Click on it. The GeoJSON file is now open and editable in geojson.io. **If you're not using the Chrome extension**, head on over to [geojson.io](http://geojson.io). Click Open on the top, click GitHub on the top, navigate through to the GeoJSON file you want to edit, and press Open. The GeoJSON file is now open and editable in geojson.io.
6. Add a point. Add some attributes for that point.
7. Notice that above your *"attribute table"* there's a little button that says "</> JSON" on it. Go ahead and click on that.
8. This is GeoJSON! Take a look at the last point in the list. It's the one you just created! Each of your attributes is in the `"properties"` section, and there are coordinates for where you placed the point housed in the `"geometry"` section. You can modify the properties and geometry directly in the GeoJSON view. If you edit the GeoJSON directly and make a mistake, use [GeoJSONLint](http://geojsonlint.com/) to find errors. What you're doing is adding some lines of code to a .geojson file! This will be important later.
9. Add as many more points as you want.
10. When you're done adding points, click Save on the top bar. A small box appears asking for a *"Commit message"*. Type in a short description of the points you added and press *Commit*.
11. Once you've done that, a little box pops up in the same area that says, *"Changes committed to GitHub:"* followed by a commit identifier.
12. This is a list of all of the commits for the repository. This list will include not only the commits you've made, but also all of the commits that were made to the dataset before you forked it.
13. Click on the identifier for your most recent commit.
14. GitHub is showing you the exact lines that were changed in the GeoJSON file with a nice little comparison between the line you changed before you committed, and the line after.
15. Click back out to your version of the repo. In the right column, click *Pull Requests*.
16. A [pull request](https://help.github.com/articles/using-pull-requests) allows the user of a forked repo to push her changes back up to the original repo. Click the green button that says *"New pull request"* at the top.
17. A screen pops up showing any commits you've made to the repository since you forked it and any changes you may have made to any files in the repository. This is to show you what you're asking the owner of the repo to change and/or include. If it all looks good, click the link at the top that says *"Click to create a pull request for this comparison"*
18. Give your request a title (something along the lines of "Add new places") and a short description of what you added. When you're ready, click the green *"Send pull request"* button.
19. Once you've sent pull request and check [GeoJSON validation status](https://travis-ci.org/Labs64/maps-munich-sportive).
21. Once the repo owner has approved your pull request, GitHub will tell you that your request was merged. Then your changes will be reflected in the parent dataset!
22. Click back over to the repo you forked from, click through to the geojson file you edited, and take a look. Your points will have been added to the original dataset.

Congratulations!
