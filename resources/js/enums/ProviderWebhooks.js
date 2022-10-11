export default {
  notify_shop: {
    param: "notify_shop",
    icon: "notifications_active",
    title: "Notify Shop",
    description:
      "We call this endpoint when a shop connect to your provider or remove your provider from it's connect os.",
  },

  sync_category: {
    param: "sync_category",
    icon: "cloud_sync",
    title: "Fetch categories",
    description:
      "We use this webhook to fetch categories from your service and update linked categories on Selldone. Each time a new shop connected or sync request trigger, we use this webhook to sync all categories information.",
  },

  sync_product: {
    param: "sync_product",
    icon: "cloud_sync",
    title: "Fetch products",
    description:
      "We use this webhook to fetch products from your service and update linked products on Selldone. Each time a new shop connected or sync request trigger, we use this webhook to sync all products information.",
  },

  create_order: {
    param: "create_order",
    icon: "flash_on",
    title: "Create order",
    description:
      "When a new order is created or merchant manually request to sync an order with external connect service provider, we will call this endpoint and send order information to your server.",
  },

  confirm_order: {
    param: "confirm_order",
    icon: "flash_on",
    title: "Confirm order manually",
    description:
      "When merchant request to confirm an order manually, we will call this endpoint to inform you about the user action.",
  },

  get_order: {
    param: "get_order",
    icon: "cloud_sync",
    title: "Get order status",
    description: "Get the last status of the order.",
  },

  cancel_order: {
    param: "cancel_order",
    icon: "flash_on",
    title: "Cancel order",
    description:
        "A call will be made when the order is canceled. Cancel webhook only call if the order was confirmed previously!",
  },




  sync_customers: {
    param: "sync_customers",
    icon: "cloud_sync",
    title: "Fetch customers",
    description:
      "We use this webhook to fetch customers from your service and update linked customers on Selldone. Each time a new shop connected or sync request trigger, we use this webhook to sync all customers information.",
  },





};
