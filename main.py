import cv2

cap = cv2.VideoCapture(0)

while cap.isOpened():
  ret, frame = cap.read()
  if ret == False:
    break
  else:
    cv2.imshow('output', frame)
    if cv2.waitKey(1) == ord('q'):
      break

cap.release()
cv2.destroyAllWindows() 