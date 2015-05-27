// file: TakeScreenshot.cs
using UnityEngine;
using System.Collections;
using System;
using System.IO;
public class TakeScreenshot : MonoBehaviour{
    public string prefix = "Screenshot";
    public int scale = 1;
    public bool useReadPixels = false;
    private Texture2D texture;

    void Update(){
        if (Input.GetKeyDown(KeyCode.P))
            StartCoroutine(TakeShot());
    }

    IEnumerator TakeShot(){
        string date = System.DateTime.Now.ToString("_d-MMM-yyyy-HH-mm-ss-f");
        int sw = Screen.width;
        int sh = Screen.height;
        Rect sRect = new Rect(0, 0, sw, sh);

        if (useReadPixels){
            yield return new WaitForEndOfFrame();
            texture = new Texture2D(sw, sh, TextureFormat.RGB24, false);
            texture.ReadPixels(sRect, 0, 0);
            texture.Apply();
            byte[] bytes = texture.EncodeToPNG();
            Destroy(texture);
            File.WriteAllBytes(Path.GetDirectoryName(Application.dataPath) + Path.DirectorySeparatorChar + prefix + date + ".png", bytes);
        }else{
            Application.CaptureScreenshot(prefix + date + ".png", scale);
        }
    }
}