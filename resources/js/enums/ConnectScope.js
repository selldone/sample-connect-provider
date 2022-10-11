export const ConnectScope = {
  read_categories: {
    color: "#F44336",
    title: "Read categories",
    desc: "We read categories from external provider and add them to Selldone stores.",
  },

  write_categories:{
    color: "#9C27B0",
    title: "Write categories",
    desc: "External provider can read information about connected categories.",
  },


  read_products:{
    color: "#673AB7",
    title: "Read products",
    desc: "We read products from external provider and add them to Selldone stores.",
  },

  write_products:{
    color: "#3F51B5",
    title: "Write products",
    desc: "External provider can read information about connected products.",
  },


  read_orders:{
    color: "#FFC107",
    title: "Read orders",
    desc: "We read existing orders from external providers. In most case we use this information to update order status, and in some case we add external orders to merchant orders processing center.",
  },
  write_orders:{
    color: "#009688",
    title: "Write orders",
    desc: "When a related order created, we inform about it to the external provider.",
  },
  read_customers:{
    color: "#4CAF50",
    title: "Read customers",
    desc: "We read customers from external provider and add them to Selldone stores.",
  },
  write_customers:{
    color: "#795548",
    title: "Write customers",
    desc: "External provider can read information about customers.",
  }



};
