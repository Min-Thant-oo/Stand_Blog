@props(['siteconfig'])
<x-ccomponents.layout>

    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>about us</h4>
                  <h2>more about us!</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>


    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <img src="blog/assets/images/about-us.jpg" alt="">
                  <div>
                    <div class="shitabout">{!!$siteconfig->about!!}</div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    
</x-ccomponents.layout>