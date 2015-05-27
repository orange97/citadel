using UnityEngine;
using System.Collections;
[AddComponentMenu("Camera-Control/Inspect Camera2")]
public class InspectCamera: MonoBehaviour {
    public Transform target;
    public float distance= 10.0f;
    public  float xSpeed= 250.0f;
    public float ySpeed= 120.0f;
    public float yMinLimit= -20.0f;
    public float yMaxLimit= 80.0f;
    private float x= 0.0f;
    private float y= 0.0f;
    public float zoomInLimit= 2.0f; 
    public float zoomOutLimit= 1.0f; 
    private float initialFOV;  

    void Start (){
        initialFOV = camera.fieldOfView;
        transform.position = new Vector3(0.0f, 0.0f, -distance) + target.position;
        Vector3 angles= transform.eulerAngles;
        x = angles.y;
        y = angles.x;
        if (rigidbody)
	    rigidbody.freezeRotation = true;
    }

    void  LateUpdate (){
    if (target && Input.GetMouseButton(0)) {
        if(Input.GetKey(KeyCode.RightShift) || Input.GetKey(KeyCode.LeftShift)){
            float zoom= camera.fieldOfView - Input.GetAxis ("Mouse Y");
            if(zoom >= initialFOV / zoomInLimit && zoom <= initialFOV / zoomOutLimit){
                camera.fieldOfView -= Input.GetAxis ("Mouse Y");
            } 					  
        } else {
            x += Input.GetAxis("Mouse X") * xSpeed * 0.02f;
            y -= Input.GetAxis("Mouse Y") * ySpeed * 0.02f;
 	    } 
        y = ClampAngle(y, yMinLimit, yMaxLimit);
        Quaternion rotation= Quaternion.Euler(y, x, 0);
        Vector3 position= rotation * new Vector3(0.0f, 0.0f, -distance) + target.position;   
        transform.rotation = rotation;
        transform.position = position;
        }
    }
    static float  ClampAngle ( float angle ,   float min ,   float max  ){
	    if (angle < -360.0f)
		    angle += 360.0f;
	    if (angle > 360.0f)
		    angle -= 360.0f;
	    return Mathf.Clamp (angle, min, max);
    }
}