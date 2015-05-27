using UnityEngine;
using System.Collections;
using System.IO;
[RequireComponent(typeof(AudioSource))]
public class LoadMovie : MonoBehaviour
{
    public enum source { Resources_folder, Internet };
    public source VideoSource = source.Resources_folder;
    public string fileName = "";
    public string fileUrl = "";
    public bool relativePath = false;
    private MovieTexture movieTexture;
    private string url;

    void Start()
    {
        if (VideoSource == source.Internet)
        {
            GetData("web");
        }
        else
        {           
            GetData("default");
        }
    }

    void GetData(string mode)
    {
        if (mode == "web")
        {
            url = fileUrl;
            if (relativePath)
            {
                url = Application.dataPath + "/" + fileUrl;
            }
            StartCoroutine(LoadWWW());
        }
        else if (mode == "default")
        {
            movieTexture = (MovieTexture)Resources.Load(fileName); ;
            StartCoroutine(PlayMovie());
        }
    }

    IEnumerator LoadWWW()
    {
        Debug.Log(url);
        WWW www = new WWW(url);
        yield return www;
        movieTexture = www.movie;
        StartCoroutine(PlayMovie());
    }

    IEnumerator PlayMovie()
    {
        while (!movieTexture.isReadyToPlay)
            yield return 0;
        Debug.Log(movieTexture);
        guiTexture.texture = movieTexture;
        audio.clip = movieTexture.audioClip;
        Debug.Log("Movie Dimensions: " + movieTexture.width + ", " + movieTexture.height);
        float movieAspectRatio = movieTexture.width / movieTexture.height;
        float screenAspectRatio = Screen.width / Screen.height;
        int movieWidth;
        int movieHeight;
        if (movieAspectRatio >= screenAspectRatio)
        {
            movieWidth = Screen.width;
            movieHeight = Mathf.RoundToInt(movieWidth / movieAspectRatio);
        }
        else
        {
            movieHeight = Screen.height;
            movieWidth = Mathf.RoundToInt(movieHeight * movieAspectRatio);
        }
        guiTexture.pixelInset = new Rect(-(movieWidth * 0.5f), -(movieHeight * 0.5f), movieWidth, movieHeight);
        movieTexture.Play();
        audio.Play();
    }

    void OnGUI()
    {
        if (GUI.Button(new Rect(0, Screen.height - 20, 60, 20), "Play"))
            movieTexture.Play();
        if (GUI.Button(new Rect(60, Screen.height - 20, 60, 20), "Pause"))
            movieTexture.Pause();
        if (GUI.Button(new Rect(120, Screen.height - 20, 60, 20), "Stop"))
            movieTexture.Stop();
    }
}