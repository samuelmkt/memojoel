<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
		<x-admin.assets.css/>
	</head>
	<body>
		<div class="layout-wrapper layout-content-navbar">
			<div class="layout-container">
				<x-admin.pages.vertical-menu/>
        <div class="layout-page">
					<x-admin.pages.navigations/>
          <div class="content-wrapper">
						<div class="container-xxl flex-grow-1 container-p-y">
							{{ $slot }}
						</div>
						<x-admin.pages.footer/>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
		<div class="buy-now">
      <!--a
        href=""
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Index</a-->
    </div>
		<x-admin.assets.js/>
  </body>
</html>
	