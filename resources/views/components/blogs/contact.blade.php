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
                <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
            
          </div>
        </div>
    </section>
</x-ccomponents.layout>