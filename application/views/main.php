<?php include 'inc/header.php'; ?>

                <section>
                    
                    <h1>Table of Content</h1>
                    <nav class="toc">
                        <ol class="main">
                            <li><a href="#what">What is this?</a></li>
                            <li><a href="#ingredients">The ingredients</a></li>
                            <li><a href="#how-to-use">How to use?</a></li>
                            <li><a href="#contribute">How can you contribute?</a></li>
                            <li>
                                <a href="#quickstart">Quickstart</a>
                                <ol class="sub">
                                    <li><a href="#directory-structure">Directory Structure</a></li>
                                    <li><a href="#controllers">Controllers</a></li>
                                    <li><a href="#models">Models</a></li>
                                    <li><a href="#views">Views</a></li>
                                </ol>
                            </li>
                        </ol>
                    </nav>
                    <div id="what">
                        <h2>What is this?</h2>
                        <p><q><span class="brand">Igniteplate</span> is a ready to use template for all your Codeigniter templates.</q></p>
                    </div>
                    <div id="ingredients">
                        <h2>The Ingredients</h2>
                        <ul class="info-list">
                            <li><a rel="tooltip" href="http://codeigniter.com" title="Go checkout Codeigniter!">Codeigniter</a></li>
                            <li><a rel="tooltip" href="http://twitter.github.com" title="Twitter Bootstrap">Twitter Bootstrap</a></li>
                            <li><a rel="tooltip" href="http://csswizardry.com/inuitcss/" data-original-title="Made by csswizardry. A permanent component of my projects.">Inuit CSS</a></li>
                            <li><a rel="tooltip" href="http://codeigniter.com/wiki/SimpleLoginSecure" data-original-title="My favorite library for managing user details">Simple Login Secure</a></li>
                        </ul>
                    </div>
                    <div id="how-to-use">
                        <h2>How to use?</h2>
                        <p>
                            So, are you wondering how to use <span class="brand">Igniteplate</span>.<br/>
                            It's actually really simple. All you need to do is fork this and start building your app.
                        </p>
                    </div>
                    <div id="contribute">
                        <h2>How to contribute?</h2>
                        <p>
                            Fork, make some changes and make a pull request.
                        </p>
                    </div>
                    <div id="quickstart">
                        <h2>Quickstart Guide</h2>
                        <p>
                            <span class="brand">Igniteplate</span> has been written in a modular fashion and is easily editable.
                        </p>
                        <div id="directory-structure">
                            <h3>Directory Structure</h3>
                            <pre class="code pre-scrollable prettyprint">
                                <span class="tier1">controllers/</span>
                                    main.php
                                    user.php
                                <span class="tier1">models/</span>
                                    usermodel.php
                                <span class="tier1">views/</span>
                                    <span class="tier2">inc/</span>
                                        footer.php
                                        header.php
                                        links.php
                                        navigation.php
                                        sidebar.php
                                    <span class="tier2">messages/</span>
                                        account_not_confirmed.php
                                        account_verified.php
                                        logged-out.php
                                        registration_problem.php
                                        registration_success.php
                                    <span class="tier2">user/</span>
                                        dashboard.php
                                        profile.php
                                    about.php
                                    login.php
                                    main.php
                                    register.php
                            </pre>
                        </div>
                        <div id="controllers">
                            <h3>Controllers</h3>
                            <p>
                                You are free to create any controllers you wish to create but there are 3 basic controllers.</br>
                                <code>admin</code>, <code>user</code> and <code>main</code>.
                            </p>
                            <p>
                                <code>admin</code> contains all administrator related functions like user management, menu control and sidebar management.<br/>
                                If you ever wish to create any administrator feature, please add it to <code>admin</code>.
                            </p>
                            <p>
                                <code>user</code> contains all user related functions like profile editing, password change and other application related features.<br/>
                                You can create other functions related to your application and place in inside <code>user</code>.
                            </p>
                            <p>
                                <code>main</code> contains all front page links. In the case of the example, it houses the home page, register, login and sample page.
                            </p>
                        </div>
                        <div id="models">
                            <h3>Models</h3>
                            <p>
                                <code>usermodel</code> includes all user related database interactions.<br/>
                                It includes functions to find the id of any user, to check if any email exists or if account is verified.<br/>
                                There are many other functions. You can other functions if you feel the need.
                            </p>
                            <p>
                                <code>adminmodel</code> houses all functions related to the administrator like user deletion and editing.
                            </p>
                        </div>
                        <div id="views">
                            <h3>Views</h3>
                            <p>
                                For the sake of convenience, I have structured the views into multiple categories.
                                <dl>
                                    <dt>Includes</dt>
                                    <dd>Contains <code>header</code>, <code>footer</code>, <code>sidebar</code>, <code>navigation</code> and <code>links</code></dd>
                                    <dt>Messages</dt>
                                    <dd>Contains messages for the users like <code>account_not_confirmed</code>, <code>account_verified</code>, <code>logged-out</code>, <code>registration_problem</code> and <code>registration_success</code></dd>
                                    <dt>User</dt>
                                    <dd>Houses <code>dashboard</code> and <code>profile</code></dd>
                                    <dt>Admin</dt>
                                    <dd>Administrator related pages.</dd>
                                </dl>
                            </p>
                        </div>
                    </div>
                    <a href="#header" class="back-to-top">Back to Top</a>
                </section>

                <script type="text/javascript">
                    $('a[rel="tooltip"]').tooltip();
                    $('.back-to-top').hide();
                    var ctr = false;
                    $(window).scroll(function(){
                        if  ($(window).scrollTop() >= 315 && ctr == false) {
                            $('.back-to-top').fadeIn();
                            ctr = true;
                        }
                        else if ($(window).scrollTop() < 315 && ctr == true) {
                            $('.back-to-top').fadeOut();
                            ctr = false;
                        }
                    });
                </script>

<?php include 'inc/footer.php'; ?>