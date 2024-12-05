<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Find Your Mentor</title>
        <link rel="stylesheet" href="../css/sh-style.css">
    </head>
    <body>
        <div id = "sh-search">
            <input type="text" id="search-bar" placeholder="Search mentors or topics...">
            <button id="search-btn">🔍</button>
        </div>

        <div id = "sh-categories">

            <div id = "cat1" class = "cat">
                <div class="category-type">
                    <p>Search for:</p>
                </div>
                <div class = "options">
                    <div class="option">
                        <input type="checkbox" id="mentor" name="Mentor">
                        <label for="mentor">Mentor</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="student" name="Student">
                        <label for="student">Student</label>
                    </div>
                </div>
            </div>

            <div id = "cat2" class = "cat">
                <div class="category-type">
                    <p>Topic:</p>
                </div>
                <div class = "options">
                    <div class="option">
                        <input type="checkbox" id="programming" name="Programming">
                        <label for="programming">Programming</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="data-science" name="Data Science">
                        <label for="data-science">Data Science</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="ai" name="AI">
                        <label for="ai">AI</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="software-engineering" name="Software Engineering">
                        <label for="software-engineering">Software Engineering</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="database-management" name="Database Management">
                        <label for="database-management">Database Management</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="networking" name="Networking">
                        <label for="networking">Networking</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="cloud" name="Cloud">
                        <label for="cloud">Cloud</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="ui-ux" name="UI/UX">
                        <label for="ui-ux">UI/UX</label>
                    </div>
                </div>
            </div>

            <div id = "cat3" class = "cat">
                <div class="category-type">
                    <p>Experience:</p>
                </div>
                <div class = "options">
                    <div class="option">
                        <input type="checkbox" id="less6m" name="Less6M">
                        <label for="less6m">Less than 6 month</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="6mto1y" name="6Mto1Y">
                        <label for="6mto1y">6 month - 1 year</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="1yto2y" name="1Yto2Y">
                        <label for="1yto2y">1 year - 2 years</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="2yto4y" name="2Yto4Y">
                        <label for="2yto4y">2 years - 4 years</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="more4y" name="More4Y">
                        <label for="more4y">4+ years</label>
                    </div>
                </div>
            </div>

            <div id = "cat4" class = "cat">
                <div class="category-type">
                    <p>Rating:</p>
                </div>
                <div class = "options">
                    <div class="option">
                        <input type="checkbox" id="8+" name="8+">
                        <label for="less6m">8+</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="7-8" name="7-8">
                        <label for="6mto1y">7-8</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="6-7" name="6-7">
                        <label for="6mto1y">6-7</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="5-6" name="5-6">
                        <label for="6mto1y">5-6</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="any" name="any">
                        <label for="6mto1y">any</label>
                    </div>
                </div>
            </div>

            <div id="cat4" class="cat">
                <div class="category-type">
                    <p>Availability:</p>
                </div>

                <div class="options">
                    <div class="option">
                        <input type="checkbox" id="sunday" name="days" value="sunday">
                        <label for="sunday">Sunday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="monday" name="days" value="monday">
                        <label for="monday">Monday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="tuesday" name="days" value="tuesday">
                        <label for="tuesday">Tuesday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="wednesday" name="days" value="wednesday">
                        <label for="wednesday">Wednesday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="thursday" name="days" value="thursday">
                        <label for="thursday">Thursday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="friday" name="days" value="friday">
                        <label for="friday">Friday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="saturday" name="days" value="saturday">
                        <label for="saturday">Saturday</label>
                    </div>
                </div>
            
                <div id="time">
                    <div class="option">
                        <label for="start-time">Start Time:</label>
                        <input type="time" id="start-time" name="start-time">
                    </div>
                    <div class="option">
                        <label for="end-time">End Time:</label>
                        <input type="time" id="end-time" name="end-time">
                    </div>
                </div>
            </div>
            

            </div>
        </div>
        <script src="../js/sh-script.js"></script>
    </body>
</html>