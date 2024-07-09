const input = document.querySelector('#imageUpload');
input.addEventListener('change', () => previewPhoto());

const previewPhoto = () => {
  const file = input.files;
  if (file) {
    const fileReader = new FileReader();
    const preview = document.querySelector('#imagePreview');
    fileReader.onload = (event) => {
      preview.setAttribute('src', event.target.result);
    };
    fileReader.readAsDataURL(file[0]);
  }
};
