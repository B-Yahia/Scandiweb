import React from "react";
import SlideBtn from "../../../Images/CaretLeft.svg";

class ProductGallery extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      selectedImg: 0,
    };
  }

  incIndex = () => {
    const { selectedImg } = this.state;
    const { gallery } = this.props;
    if (gallery.length - 1 === selectedImg) {
      this.setState({ selectedImg: 0 });
    } else {
      this.setState({ selectedImg: selectedImg + 1 });
    }
  };

  decIndex = () => {
    const { selectedImg } = this.state;
    const { gallery } = this.props;
    if (selectedImg === 0) {
      this.setState({ selectedImg: gallery.length - 1 });
    } else {
      this.setState({ selectedImg: selectedImg - 1 });
    }
  };

  render() {
    const { gallery } = this.props;
    const { selectedImg } = this.state;

    return (
      <div data-testid="product-gallery" className="product-gallery">
        <div className="product_images">
          {gallery.map((img, index) => (
            <img
              src={img}
              className={
                index === selectedImg
                  ? "product_images_item selected"
                  : "product_images_item"
              }
              key={index}
              onClick={() => this.setState({ selectedImg: index })}
              alt=""
            />
          ))}
        </div>
        <div className="selected_image_container">
          <img
            src={SlideBtn}
            className="slide_btn right_btn"
            onClick={this.incIndex}
            alt=""
          />
          <img
            src={SlideBtn}
            className="slide_btn left_btn"
            onClick={this.decIndex}
            alt=""
          />
          <img src={gallery[selectedImg]} className="selected_image" alt="" />
        </div>
      </div>
    );
  }
}

export default ProductGallery;
