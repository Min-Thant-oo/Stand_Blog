@props(['siteconfig'])
<x-ccomponents.layout>

  
    
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>contact us</h4>
                  <h2>let’s stay in touch!</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>

    <x-adminform.flashnoti :success="session('success')" />

    <section class="contact-us">
        <div class="container">
          <div class="row">
          
            <div class="col-lg-12">
              <div class="down-contact">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="sidebar-item contact-form">
                      <div class="sidebar-heading">
                        <h2>SEND US A MESSAGE</h2>
                      </div>
                      <div class="content">
                        <form id="contact" action="/contact-store" method="post">
                          @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                
                                    <input name="name" value="{{old('name')}}" required type="text" id="name" placeholder="YOUR NAME" >
                                    <x-ccomponents.error name='name' />
                                
                                </div>
                                <div class="col-md-6 col-sm-12">
                                
                                    <input name="email" value="{{old('email')}}" required type="email" id="email" placeholder="YOUR EMAIL" >
                                    <x-ccomponents.error name='email' />
                                
                                </div>
                                <div class="col-lg-12 shit-contact-subject">
                                
                                    <input name="subject" value="{{old('subject')}}" required type="text" id="email" placeholder="SUBJECT" >
                                    <x-ccomponents.error name='subject' />
                                
                                </div>
                                <div class="col-lg-12 ">
                                
                                    <textarea name="message" rows="6" id="message" required placeholder="YOUR MESSAGE" >{{old('message')}}</textarea>
                                    <x-ccomponents.error name='message' />
                                
                                </div>
                                <div class="col-lg-12">
                                
                                    <button type="submit" id="form-submit" class="main-button">SUBMIT</button>
                                
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="sidebar-item contact-information">
                      <div class="sidebar-heading">
                        <h2>CONTACT INFORMATION</h2>
                      </div>
                      <div class="content">
                        <ul>
                          <li>
                            <h5>{{$siteconfig->phonenumber}}</h5>
                            <span>PHONE NUMBER</span>
                          </li>
                          <li>
                            <h5>{{$siteconfig->email}}</h5>
                            <span>EMAIL ADDRESS</span>
                          </li>
                          <li>
                            <h5>{{$siteconfig->address}}</h5>
                            <span>STREET ADDRESS</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-12">
              <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3009.985507079343!2d28.971553675075263!3d41.02557301836125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab9e7a7777c43%3A0x4c76cf3dcc8b330b!2sGalata%20Tower!5e0!3m2!1sen!2smm!4v1708668132809!5m2!1sen!2smm" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
            
          </div>
        </div>
    </section>
</x-ccomponents.layout>