function deleteSubject(subject) {
  if (subject === '') {
    throw new Error('Invalid subject!');
  }
  $.ajax({
      url: '/deletesubject/' + subject,
      method: 'POST',
      success: function() {

      },
      error: function(response) {

      }
  });
}
