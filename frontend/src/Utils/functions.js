const sameAttributes = (selectedAttributes1, selectedAttributes2) => {
  for (let i = 0; i < selectedAttributes1.length; i++) {
    const attrIndex = selectedAttributes2.findIndex(
      (element) =>
        element.attributeSet.id === selectedAttributes1[i].attributeSet.id
    );
    if (
      attrIndex === -1 ||
      selectedAttributes2[attrIndex].attribute.id !==
        selectedAttributes1[i].attribute.id
    ) {
      return false;
    }
  }
  return true;
};

export const findOrderlinesWithSameProduct = (NewOrderline, cart) => {
  for (let i = 0; i < cart.length; i++) {
    if (cart[i].product.id === NewOrderline.product.id) {
      if (
        sameAttributes(
          cart[i].selectedAttributes,
          NewOrderline.selectedAttributes
        )
      ) {
        return i;
      }
    }
  }
  return -1;
};

export const calculateTheTotalAmount = (cart) => {
  let total = 0;
  for (let i = 0; i < cart.length; i++) {
    total += cart[i].product.prices[0].amount * cart[i].units;
  }
  return parseFloat(total.toFixed(2));
};

export function toKebabCase(text) {
  return text
    .toLowerCase()
    .replace(/[\W_]+/g, " ")
    .trim()
    .replace(/\s+/g, "-");
}

export function getOrderlinesData(orderlines) {
  return orderlines.map((orderline) => ({
    units: orderline.units,
    product: {
      id: orderline.product.id,
    },
    selectedAttributes: getSelectedAttributes(orderline.selectedAttributes),
  }));
}

function getSelectedAttributes(selectedAttributes) {
  return selectedAttributes.map(({ attributeSet, attribute }) => ({
    attributeSet: {
      id: attributeSet.id,
    },
    attribute: {
      id: attribute.id,
    },
  }));
}
