using UnityEngine;
using System.Collections;

public class TelescopicView : MonoBehaviour
{
    public float ZoomLevel = 2.0f;
    public float ZoomInSpeed = 100.0f;
    public float ZoomOutSpeed = 100.0f;
    private float initFOV;
    //private Vignetting vignette;
    //public float vignetteAmount = 10.0f;

    void Start(){
        initFOV = Camera.main.fieldOfView;
        //vignette = this.GetComponent("Vignetting") as Vignetting;
    }
    void Update(){
        if (Input.GetKey(KeyCode.Mouse0)){
            ZoomView();
        }else{
            ZoomOut();
        }
    }
    void ZoomView(){
        if (Mathf.Abs(Camera.main.fieldOfView - (initFOV / ZoomLevel)) < 0.5f){
            Camera.main.fieldOfView = initFOV / ZoomLevel;
            // vignette. intensity = vignetteAmount;
        }else if (Camera.main.fieldOfView - (Time.deltaTime * ZoomInSpeed) >= (initFOV / ZoomLevel)){
            Camera.main.fieldOfView -= (Time.deltaTime * ZoomInSpeed);
            // vignette. intensity = vignetteAmount * (Camera.main.fieldOfView - initFOV)/((initFOV / ZoomLevel) - initFOV);
        }
    }
    void ZoomOut(){
        if (Mathf.Abs(Camera.main.fieldOfView - initFOV) < 0.5f){
            Camera.main.fieldOfView = initFOV;
            // vignette. intensity = 0;
        }else if (Camera.main.fieldOfView + (Time.deltaTime * ZoomOutSpeed) <= initFOV){
            Camera.main.fieldOfView += (Time.deltaTime * ZoomOutSpeed);
            //vignette.intensity = vignetteAmount * (Camera.main.fieldOfView - initFOV)/((initFOV / ZoomLevel) - initFOV);
        }
    }
}
