<template>
  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-sm col-md-6 col-lg ftco-animate">
            <div class="row">
              <div class="col-md-6" >
                <div class="card">
                      <div class="card-header py-3 bg-primary">
                        <h5 class="m-0 font-weight-bold">Find & Mark a Location</h5>
                      </div>
                      
                      <div class="card-body"> 
                        <div>
                            <div>
                              
                              <label class="offset-2">
                                <gmap-autocomplete
                                  @place_changed="setPlace">
                                </gmap-autocomplete>
                                <button class="btn btn-sm btn-primary" @click="addMarker">Mark</button>
                              </label>
                              <br>
                              <center><small class="m-0 font-weight-bold text-danger"><i class="fa fa-map-marker" aria-hidden="true"></i> 
{{ userPosition }}</small></center>
                              <br/>
                              <!--   My lat : {{ center.lat }} <br>
                                My Lng : {{ center.lng }} -->
                            </div>
                            <!-- This is for passing the value -->
                            <input type="hidden" name="place" v-model="center">
                            <br>
                            <!-- <span v-if="places[0]">{{ places[0].name }} <br> {{ places[0].photos }} <br>  {{ places[0].vicinity }}
                            
                                <pre>
                                    <code>
                                {{places[0]}}
                            </code> 
                                </pre>
                            </span> -->
                            <gmap-map
                              :center="center"
                              :zoom="15"
                              style="width:100%;  height: 400px; border: 5px solid black;"
                            >
                              <gmap-marker
                                :key="index"
                                v-for="(m, index) in markers"
                                :position="m.position"
                                @click="center=m.position"
                              ></gmap-marker>
                            </gmap-map>
                          </div>
                      </div>
                    </div>
              </div>
              <div class="col-md-6">
                
              <div class="col-md-12">
                <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
              <h5 class="m-0 font-weight-bold">Nearby Hotels</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Hotel Name</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sl</th>
                      <th>Hotel Name</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  
                    <tr v-for="(place,i) in found.data" :key="place.id">
                      <td>{{ i+1 }}</td>
                      <td>{{ place.hname }}</td>
                      <td><img :src="' '+place.image" style="height: 100px;width: 150px;" ></img></td>
                      <td><button class="btn btn-sm btn-success" @click.prevent="viewDetails(place.id)">view details</button></td>
                    </tr>
                     
                    
                  </tbody>
                </table>
                <pagination :data="found" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
          </div>
              </div>
              </div>
              <br>
              
            </div>
            
          </div>
          
          
          
        </div>
      </div>
</template>

<script>
// Add the following code if you want the name of the file appear on select

export default {
  name: "GoogleMap",
  data() {
    return {
      // default to Montreal to keep it simple
      // change this to whatever makes sense
      center: { lat: 45.508, lng: -73.587 , name:''},
      markers: [],
      places: [],
      currentPlace: null,
      lat:0,
      found:{},
      userPosition:null,
    };
  },

  mounted() {
    this.geolocate();
  },

  methods: {
    // Passes Lat and Lon to app.js file
    pass(lat){
        return this.$emit('input',lat);
    },
    // receives a place object via the autocomplete component
    setPlace(place) {
      this.currentPlace = place;
      this.lat = this.currentPlace.geometry.location.lat();
      // this.pass(this.lat);
    },
    addMarker() {
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng(),
          name: this.currentPlace.name
        };
        this.markers=[];
        this.markers.push({ position: marker });
        this.places.push(this.currentPlace);
        this.center = marker;
        this.getResults();
        this.pass(this.center); //This is passing lat lan value
        this.currentPlace = null;
      }
    },
    geolocate: function() {
      navigator.geolocation.getCurrentPosition(position => {

        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
        // Added Later
        const marker = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        this.markers=[];
        this.markers.push({ position: marker });

        // Added  Later
        this.getuserPosition(this.center.lat,this.center.lng);
        this.getResults();
      });
      
    },
    getResults(page = 1) {
      axios.post('show-hotel?page='+page,{
                    lat:this.center.lat,
                    lng:this.center.lng
                })
        .then(response => {
            // console.log(response.data);
            this.found = response.data;
            // console.log(this.found.data);
            // const entries = Object.entries(this.found.data)
            // console.log(entries);

            // const keys = Object.keys(this.found.data)
            // for (const key of keys) {
            //   console.log(key)
            // }
            let markers=[];
            $.each(this.found.data, function(key, value) {
             // list.push(key);
             // console.log(value.pname);
             markers.push({  position: new google.maps.LatLng(value.lat, value.lng) });
           });
            markers.push({  position: new google.maps.LatLng(this.center.lat, this.center.lng) });
            this.markers = markers;
            // entries.forEach((place) => {
            //   console.log(place.pname);
            //   this.markers.push({  position: new google.maps.LatLng(place.lat, place.lng) });
            //   });
        });
    },
    getuserPosition: function(lat,lng) {
      axios.get('https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+lng+'&key=AIzaSyDwwFgz7dCIYU4jZ8TOSD0VNQK-xz2iY9o')
       .then(response => { 
                    this.userPosition = response.data.results[0].formatted_address
                    // console.log("The town is " + this.current);
                });
    },
    viewDetails(placeid){
        axios.get('hotel-details/'+placeid)
                .then(response => { 
                  // Redirecting to laravel
                  window.location = response.data.redirect;
                });
    },

  }
};
</script>