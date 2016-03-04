# bannerphp
<p>The project should consist of 3 files:
<ul>
<li>index1.html</li>
<li>index2.html</li>
<li>banner.php</li>
</ul>
and 1 MySQL table with the next mandatory columns:
<ul>
<li>ip_address</li>
<li>user_agent</li>
<li>view_date</li>
<li>page_url</li>
<li>views_count</li>
</ul>
</p>
<p>index1.html and index2.html should have an image tag that inserts some image into the page using banner.php file: <img src="banner.php">
</p>
<p>
Every time the image is loaded, the page visitor's info should be recorded in the MySQL table:
<ul>
<li>IP address of the visitor (ip_address column)</li>
<li>Their user-agent (user_agent column)</li>
<li>The date and time the image was shown for this visitor (view_date column)</li>
<li>URL of the page where the image was loaded (page_url column)</li>
<li>Number of image loads for the same visitor (views_count column) - conditions are described below.</li>
</ul>
</p>
<p>If a user with the same IP address, user-agent, and page URL hits the page again, the view_date column has to be updated with the current date and time, as well as views_count column has to be increased by 1.
<p>
