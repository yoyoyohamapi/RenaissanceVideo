<?php

namespace Video\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Video\CommonBundle\Entity\Video;
use Video\WebBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
class FileController extends BaseController
{
    public function uploadAction(Request $request)
    {
        $form=$this->createFormBuilder()
            ->setAction($this->generateUrl('upload'))
            ->add('video','file',array('label'=>'视频上传'))
            ->add('cover','file',array('label'=>'封面上传'))
            ->add('上传','submit')
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid())
        {
            $data=$form->getData();
            $fileUpload=$this->get('fileUpload');
            $fileUpload->setFile($data['video']);
            $video_name=$fileUpload->getFileName();
            $video_size=$fileUpload->getFileSize();
            $video_type=$fileUpload->getFileType();
            $em=$this->getDoctrine()->getManager();
            $query=$em->createQuery(
                'SELECT v.videoIndex 
                FROM VideoCommonBundle:Video v
                WHERE v.videoName = :filename
                ORDER BY v.videoIndex'
            )->setParameter('filename',$video_name);
            $indexes=$query->getResult();
            $len=count($indexes);
            for($i=0;$i<$len;$i++){
                if($i!= $indexes[$i]['videoIndex']){
                    $index=$i;
                    break;
                }
            }
            if($i==$len)$index=$len;
            $fileUpload->setUploadPath('video/');
            $fileUpload->uploadFile($index);
            $video_url=$fileUpload->getUploadUrl($index);
            $fileUpload->setFile($data['cover']);
            $fileUpload->setUploadPath('img/');
            $fileUpload->uploadFile();
            $cover_url=$fileUpload->getUploadUrl();
            $video=new Video();
            $video->setVideoIndex($index);
            $video->setVideoName($video_name);
            $video->setVideoUrl($video_url);
            //var_dump(getdate());
            $uptime=new \DateTime("now");
            //var_dump($uptime);
            $video->setVideoUptime($uptime);
            $video->setVideoSize($video_size);
            $video->setVideoType($video_type);
            $video->setVideoCover($cover_url);
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('index'));
        }
        return $this->render('VideoWebBundle:Layout:file_bar.html.twig',array(
             'upload_form'=>$form->createView()
            )); 
    
    }

    public function downloadAction()
    {
        return $this->render('VideoWebBundle:Layout:download.html.twig', array(
                // ...
            ));    }

    public function deleteAction()
    {
        return $this->render('VideoWebBundle:Layout:delete.html.twig', array(
                // ...
            ));    }

}
