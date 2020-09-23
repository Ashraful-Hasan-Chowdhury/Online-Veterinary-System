<template>
  <div>
    <div>
      
      <!-- <label class="offset-2">
        <gmap-autocomplete
          @place_changed="setPlace">
        </gmap-autocomplete>
        <button class="btn btn-sm btn-primary" @click="addMarker">Mark</button>
      </label>
      <br/> -->
      <!--   My lat : {{ center.lat }} <br>
        My Lng : {{ center.lng }} -->
    </div>
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
</template>

<script>
// Add the following code if you want the name of the file appear on select

export default {
  name: "GoogleMap",
  data() {
    return {
      // default to Montreal to keep it simple
      // change this to whatever makes sense
      center: { lat: 45.508, lng: -73.587 , name: ''},
      markers: [],
      places: [],
      currentPlace: null,
      lat:0,
    };
  },
  props:[
            'latval',
            'lngval',
        ], 

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
        this.markers.push({ position: marker });
        this.places.push(this.currentPlace);
        this.center = marker;
        this.pass(this.center); //This is passing lat lan value
        this.currentPlace = null;
      }
    },
    geolocate: function() {
      navigator.geolocation.getCurrentPosition(position => {
        this.center = {
          lat: this.latval,
          lng: this.lngval
        };
        // Added Later
        const marker = {
          lat: this.latval,
          lng: this.lngval
        };
        this.markers.push({ position: marker });
        // Added  Later
      });
      
    }
  }
};
</script>